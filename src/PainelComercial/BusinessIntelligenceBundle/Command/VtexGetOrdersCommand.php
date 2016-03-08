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

class VtexGetOrdersCommand extends ContainerAwareCommand {

    protected $logger;

    protected function configure()
    {
        $this
            ->setName('vtex:orders:get')
            ->setDescription('Busca os pedidos na VTEX')
            ->addArgument(
                'page limit',
                InputArgument::REQUIRED,
                'Limite de páginas para consulta na VTEX'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->getContainer()->get('logger');
        $locker = new LockHandler('vtex:orders:get');
        if(!$locker->lock()){
            $logger->info('Este comando está sendo executado por outro processo.');
            $output->writeln('Este comando está sendo executado por outro processo.');
            return 0;
        }

        $em = $this->getContainer()->get('doctrine')->getManager();
        $query = new Query(['orderBy' =>'creationDate,desc']);
        $page = 1;
        $pageLimit = $input->getArgument('page limit');
        while($page <= $pageLimit){
            $query->setParam('page',$page);

            $orderService = $this->getContainer()->get('oms.orders');
            $orders = $orderService->orders(null,$query);

            foreach($orders->list as $order){
                $orderRepository = $em->getRepository('PainelComercialBusinessIntelligenceBundle:Order');
                $orderArray = $orderRepository->findBy(['orderId' => $order->orderId]);
                if(count($orderArray) == 0){
                    $order = OrderFactoryFromVtex::create($orderService->orders($order->orderId));
                    $em->persist($order);
                }
            }
            $em->flush();
            $page += 1;
        }
    }
}