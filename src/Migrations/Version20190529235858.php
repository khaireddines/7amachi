<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529235858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE convention (id INT AUTO_INCREMENT NOT NULL, code_p_id INT DEFAULT NULL, mat_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, INDEX IDX_8556657EE5900963 (code_p_id), INDEX IDX_8556657EDCA7C833 (mat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE investisseur (id INT AUTO_INCREMENT NOT NULL, mat VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, nom_societe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, code_p VARCHAR(255) NOT NULL, libelle_p VARCHAR(255) NOT NULL, secteur_p VARCHAR(255) NOT NULL, cout_fixe INT NOT NULL, cout_var INT NOT NULL, duree_p DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE convention ADD CONSTRAINT FK_8556657EE5900963 FOREIGN KEY (code_p_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE convention ADD CONSTRAINT FK_8556657EDCA7C833 FOREIGN KEY (mat_id) REFERENCES investisseur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE convention DROP FOREIGN KEY FK_8556657EDCA7C833');
        $this->addSql('ALTER TABLE convention DROP FOREIGN KEY FK_8556657EE5900963');
        $this->addSql('DROP TABLE convention');
        $this->addSql('DROP TABLE investisseur');
        $this->addSql('DROP TABLE project');
    }
}
