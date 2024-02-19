<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240218220501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marque_page ADD mot_cle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE marque_page ADD CONSTRAINT FK_19292F83FE94535C FOREIGN KEY (mot_cle_id) REFERENCES mot_cles (id)');
        $this->addSql('CREATE INDEX IDX_19292F83FE94535C ON marque_page (mot_cle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marque_page DROP FOREIGN KEY FK_19292F83FE94535C');
        $this->addSql('DROP INDEX IDX_19292F83FE94535C ON marque_page');
        $this->addSql('ALTER TABLE marque_page DROP mot_cle_id');
    }
}
