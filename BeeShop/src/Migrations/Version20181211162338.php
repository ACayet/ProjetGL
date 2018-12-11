<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211162338 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE produit ADD prix NUMERIC(5, 6) NOT NULL, ADD stock INT NOT NULL, CHANGE id id_produit INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD PRIMARY KEY (id_produit)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit MODIFY id_produit INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE produit DROP prix, DROP stock, CHANGE id_produit id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD PRIMARY KEY (id)');
    }
}
