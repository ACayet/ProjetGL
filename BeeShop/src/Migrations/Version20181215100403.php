<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181215100403 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit ADD id_produit INT AUTO_INCREMENT NOT NULL, ADD prix NUMERIC(5, 2) NOT NULL, CHANGE id stock INT NOT NULL, ADD PRIMARY KEY (id_produit)');
        $this->addSql('ALTER TABLE utilisateur CHANGE admin admin TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit MODIFY id_produit INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE produit DROP id_produit, DROP prix, CHANGE stock id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE admin admin TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
