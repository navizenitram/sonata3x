<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305150754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill_rows CHANGE bill_id bills_id INT NOT NULL');
        $this->addSql('ALTER TABLE bill_rows ADD CONSTRAINT FK_F9949C0B2ABC37A4 FOREIGN KEY (bills_id) REFERENCES bills (id)');
        $this->addSql('CREATE INDEX IDX_F9949C0B2ABC37A4 ON bill_rows (bills_id)');
        $this->addSql('ALTER TABLE bills ADD price NUMERIC(5, 2) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill_rows DROP FOREIGN KEY FK_F9949C0B2ABC37A4');
        $this->addSql('DROP INDEX IDX_F9949C0B2ABC37A4 ON bill_rows');
        $this->addSql('ALTER TABLE bill_rows CHANGE bills_id bill_id INT NOT NULL');
        $this->addSql('ALTER TABLE bills DROP price');
    }
}
