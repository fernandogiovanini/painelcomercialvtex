<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 04/11/15
 * Time: 15:03
 */

namespace PainelComercial\BusinessIntelligenceBundle\Command;

use PainelComercial\BusinessIntelligenceBundle\Entity\OrderFactoryFromVtex;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\LockHandler;
use Vtex\ApiBundle\Query\Query;
use Vtex\ApiBundle\Service\Oms\OrderService;

class VtexGetOrderCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('vtex:order:get')
            ->setDescription('Busca um pedido na VTEX')
            ->addArgument(
                'order id',
                InputArgument::REQUIRED,
                'O número do pedido'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $locker = new LockHandler('vtex:order:get');
        if(!$locker->lock()){
            $output->writeln('Este comando está sendo executado por outro processo.');
            return 0;
        }

        $orderId = $input->getArgument('order id');

        $em = $this->getContainer()->get('doctrine')->getManager();
        $orderRepository = $em->getRepository('PainelComercialBusinessIntelligenceBundle:Order');
        $orderArray = $orderRepository->findBy(['orderId' => $orderId]);
        if(count($orderArray) == 0){
            $orderService = $this->getContainer()->get('oms.orders');
            $order = OrderFactoryFromVtex::create($orderService->orders($orderId));
            $em->persist($order);
        }

        $em->flush();
    }
}