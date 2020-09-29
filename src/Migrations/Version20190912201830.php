<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190912201830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE paiement ADD parent_eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E95A16B63 FOREIGN KEY (parent_eleve_id) REFERENCES parents_eleves (id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E95A16B63 ON paiement (parent_eleve_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E95A16B63');
        $this->addSql('DROP INDEX IDX_B1DC7A1E95A16B63 ON paiement');
        $this->addSql('ALTER TABLE paiement DROP parent_eleve_id');
    }
}
