<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023131212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD billing_id INT DEFAULT NULL, ADD shipping_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993983B025C87 FOREIGN KEY (billing_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984887F3F8 FOREIGN KEY (shipping_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_F52993983B025C87 ON `order` (billing_id)');
        $this->addSql('CREATE INDEX IDX_F52993984887F3F8 ON `order` (shipping_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993983B025C87');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984887F3F8');
        $this->addSql('DROP INDEX IDX_F52993983B025C87 ON `order`');
        $this->addSql('DROP INDEX IDX_F52993984887F3F8 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP billing_id, DROP shipping_id');
    }
}
