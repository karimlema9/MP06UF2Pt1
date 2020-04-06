<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200401194445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equip (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, categoria VARCHAR(50) NOT NULL, divisio INT NOT NULL, any_fundacio DATE NOT NULL, partits_jugats INT NOT NULL, partits_guanyats INT NOT NULL, partits_empatats INT NOT NULL, partits_perduts INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrenador (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, cognom VARCHAR(50) NOT NULL, rol TINYINT(1) NOT NULL, edat INT NOT NULL, partits_jugats INT NOT NULL, partits_guanyats INT NOT NULL, partits_empatats INT NOT NULL, partits_perduts INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrenadors_equips (entrenadors_id INT NOT NULL, equips_id INT NOT NULL, INDEX IDX_3453BAD2F63F5F75 (entrenadors_id), INDEX IDX_3453BAD218F413CA (equips_id), PRIMARY KEY(entrenadors_id, equips_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entrenadors_equips ADD CONSTRAINT FK_3453BAD2F63F5F75 FOREIGN KEY (entrenadors_id) REFERENCES entrenador (id)');
        $this->addSql('ALTER TABLE entrenadors_equips ADD CONSTRAINT FK_3453BAD218F413CA FOREIGN KEY (equips_id) REFERENCES equip (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entrenadors_equips DROP FOREIGN KEY FK_3453BAD218F413CA');
        $this->addSql('ALTER TABLE entrenadors_equips DROP FOREIGN KEY FK_3453BAD2F63F5F75');
        $this->addSql('DROP TABLE equip');
        $this->addSql('DROP TABLE entrenador');
        $this->addSql('DROP TABLE entrenadors_equips');
    }
}
