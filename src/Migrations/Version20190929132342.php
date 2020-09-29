<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190929132342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, plain_password VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eleves ADD enseignat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B1A84848FC FOREIGN KEY (enseignat_id) REFERENCES enseignants (id)');
        $this->addSql('CREATE INDEX IDX_383B09B1A84848FC ON eleves (enseignat_id)');
        $this->addSql('ALTER TABLE enseignants ADD classe VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B1A84848FC');
        $this->addSql('DROP INDEX IDX_383B09B1A84848FC ON eleves');
        $this->addSql('ALTER TABLE eleves DROP enseignat_id');
        $this->addSql('ALTER TABLE enseignants DROP classe');
    }
}
