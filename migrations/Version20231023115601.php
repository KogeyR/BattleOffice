<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023115601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD billing_address_id INT DEFAULT NULL, ADD shipping_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939879D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F529939879D0C0E4 ON `order` (billing_address_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993984D4CFF2B ON `order` (shipping_address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939879D0C0E4');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984D4CFF2B');
        $this->addSql('DROP INDEX UNIQ_F529939879D0C0E4 ON `order`');
        $this->addSql('DROP INDEX UNIQ_F52993984D4CFF2B ON `order`');
        $this->addSql('ALTER TABLE `order` DROP billing_address_id, DROP shipping_address_id');
    }
}
