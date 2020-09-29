<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911121419 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eleves ADD id_parent_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1F24F7657 FOREIGN KEY (id_parent_id) REFERENCES parents_eleves (id)');
        $this->addSql('CREATE INDEX IDX_383B09B1F24F7657 ON eleves (id_parent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1F24F7657');
        $this->addSql('DROP INDEX IDX_383B09B1F24F7657 ON eleves');
        $this->addSql('ALTER TABLE eleves DROP id_parent_id');
    }
}
