<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200401203043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equips_entrenadors (equips_id INT NOT NULL, entrenadors_id INT NOT NULL, INDEX IDX_748AB79818F413CA (equips_id), INDEX IDX_748AB798F63F5F75 (entrenadors_id), PRIMARY KEY(equips_id, entrenadors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equips_entrenadors ADD CONSTRAINT FK_748AB79818F413CA FOREIGN KEY (equips_id) REFERENCES equip (id)');
        $this->addSql('ALTER TABLE equips_entrenadors ADD CONSTRAINT FK_748AB798F63F5F75 FOREIGN KEY (entrenadors_id) REFERENCES entrenador (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE equips_entrenadors');
    }
}
