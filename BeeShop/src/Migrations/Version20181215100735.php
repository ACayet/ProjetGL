<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181215100735 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur ADD id_utilisateur INT AUTO_INCREMENT NOT NULL, DROP id, CHANGE admin admin TINYINT(1) DEFAULT \'0\' NOT NULL, ADD PRIMARY KEY (id_utilisateur)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur MODIFY id_utilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE utilisateur ADD id INT NOT NULL, DROP id_utilisateur, CHANGE admin admin TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
