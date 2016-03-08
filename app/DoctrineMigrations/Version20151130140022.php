<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151130140022 extends AbstractMigration implements ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vtex_item CHANGE price price NUMERIC(9, 2) DEFAULT NULL, CHANGE listPrice listPrice NUMERIC(9, 2) DEFAULT NULL, CHANGE manualPrice manualPrice NUMERIC(9, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE vtex_order CHANGE value value NUMERIC(9, 2) DEFAULT NULL, CHANGE creationDate creationDate DATETIME DEFAULT NULL, CHANGE lastChange lastChange DATETIME DEFAULT NULL, CHANGE totalsItems totalsItems NUMERIC(9, 2) DEFAULT NULL, CHANGE totalsDiscount totalsDiscount NUMERIC(9, 2) DEFAULT NULL, CHANGE totalsShipping totalsShipping NUMERIC(9, 2) DEFAULT NULL, CHANGE totalsTax totalsTax NUMERIC(9, 2) DEFAULT NULL');

        $this->addSql('
            UPDATE vtex_order
            SET
                vtex_order.value = vtex_order.value/100,
                vtex_order.totalsItems = vtex_order.totalsItems/100,
                vtex_order.totalsDiscount = vtex_order.totalsDiscount/100,
                vtex_order.totalsShipping = vtex_order.totalsShipping/100,
                vtex_order.totalsTax = vtex_order.totalsTax/100');

        $this->addSql('
            UPDATE vtex_item
            SET
                vtex_item.price = vtex_item.price/100,
                vtex_item.listPrice = vtex_item.listPrice/100,
                vtex_item.manualPrice = vtex_item.manualPrice/100');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vtex_item CHANGE price price INT DEFAULT NULL, CHANGE listPrice listPrice INT DEFAULT NULL, CHANGE manualPrice manualPrice INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vtex_order CHANGE value value INT DEFAULT NULL, CHANGE creationDate creationDate DATETIME DEFAULT NULL, CHANGE lastChange lastChange DATETIME DEFAULT NULL, CHANGE totalsItems totalsItems INT DEFAULT NULL, CHANGE totalsDiscount totalsDiscount INT DEFAULT NULL, CHANGE totalsShipping totalsShipping INT DEFAULT NULL, CHANGE totalsTax totalsTax INT DEFAULT NULL');

        $this->addSql('
            UPDATE vtex_order
            SET
                vtex_order.value = vtex_order.value * 100,
                vtex_order.totalsItems = vtex_order.totalsItems * 100,
                vtex_order.totalsDiscount = vtex_order.totalsDiscount * 100,
                vtex_order.totalsShipping = vtex_order.totalsShipping * 100,
                vtex_order.totalsTax = vtex_order.totalsTax * 100');

        $this->addSql('
            UPDATE vtex_item
            SET
                vtex_item.price = vtex_item.price * 100,
                vtex_item.listPrice = vtex_item.listPrice * 100,
                vtex_item.manualPrice = vtex_item.manualPrice * 100');
    }
}
