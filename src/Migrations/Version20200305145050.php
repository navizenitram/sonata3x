<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200305145050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bills CHANGE customer_id customer_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0B171EB6C FOREIGN KEY (customer_id_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_22775DD0B171EB6C ON bills (customer_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bills DROP FOREIGN KEY FK_22775DD0B171EB6C');
        $this->addSql('DROP INDEX IDX_22775DD0B171EB6C ON bills');
        $this->addSql('ALTER TABLE bills CHANGE customer_id_id customer_id INT NOT NULL');
    }
}
