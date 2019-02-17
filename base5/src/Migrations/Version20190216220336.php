<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190216220336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE passeport (id INT AUTO_INCREMENT NOT NULL, nom_demandeur VARCHAR(50) NOT NULL, prenom_demandeur VARCHAR(50) DEFAULT NULL, nin VARCHAR(20) DEFAULT NULL, montant INT DEFAULT NULL, dossier_expedie VARCHAR(30) DEFAULT NULL, date_expedie DATETIME DEFAULT NULL, passeport_arrive VARCHAR(30) DEFAULT NULL, date_arrive DATETIME DEFAULT NULL, passeport_livre VARCHAR(30) DEFAULT NULL, date_livre DATETIME NOT NULL, date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lot ADD lot_id INT NOT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291BA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES passeport (id)');
        $this->addSql('CREATE INDEX IDX_B81291BA8CBA5F7 ON lot (lot_id)');
        $this->addSql('ALTER TABLE observation ADD observation_id INT NOT NULL');
        $this->addSql('ALTER TABLE observation ADD CONSTRAINT FK_C576DBE01409DD88 FOREIGN KEY (observation_id) REFERENCES passeport (id)');
        $this->addSql('CREATE INDEX IDX_C576DBE01409DD88 ON observation (observation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291BA8CBA5F7');
        $this->addSql('ALTER TABLE observation DROP FOREIGN KEY FK_C576DBE01409DD88');
        $this->addSql('DROP TABLE passeport');
        $this->addSql('DROP INDEX IDX_B81291BA8CBA5F7 ON lot');
        $this->addSql('ALTER TABLE lot DROP lot_id');
        $this->addSql('DROP INDEX IDX_C576DBE01409DD88 ON observation');
        $this->addSql('ALTER TABLE observation DROP observation_id');
    }
}
