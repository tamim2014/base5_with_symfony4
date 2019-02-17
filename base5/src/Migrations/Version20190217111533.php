<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217111533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE passeport ADD observation_id INT DEFAULT NULL, ADD lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE passeport ADD CONSTRAINT FK_69DAB86A1409DD88 FOREIGN KEY (observation_id) REFERENCES observation (id)');
        $this->addSql('ALTER TABLE passeport ADD CONSTRAINT FK_69DAB86AA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_69DAB86A1409DD88 ON passeport (observation_id)');
        $this->addSql('CREATE INDEX IDX_69DAB86AA8CBA5F7 ON passeport (lot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE passeport DROP FOREIGN KEY FK_69DAB86A1409DD88');
        $this->addSql('ALTER TABLE passeport DROP FOREIGN KEY FK_69DAB86AA8CBA5F7');
        $this->addSql('DROP INDEX IDX_69DAB86A1409DD88 ON passeport');
        $this->addSql('DROP INDEX IDX_69DAB86AA8CBA5F7 ON passeport');
        $this->addSql('ALTER TABLE passeport DROP observation_id, DROP lot_id');
    }
}
