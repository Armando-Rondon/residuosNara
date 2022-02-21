<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121131404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("insert into Empresa (username, nombre, direccion, password) values ('Zaam-Dox', 'Shufflebeat', 1, '9jdePsvcSF');");
        $this->addSql("insert into Empresa (username, nombre, direccion, password) values ('Trippledex', 'Livepath', 1, 'nRUW0H2L6ZY');");
        $this->addSql("insert into Empresa (username, nombre, direccion, password) values ('Bitchip', 'Quimm', 5, 'dtzZwNw');");
        $this->addSql("insert into Empresa (username, nombre, direccion, password) values ('Span', 'Voonte', 5, 'kL505qGvF');");
        $this->addSql("insert into Empresa (username, nombre, direccion, password) values ('Biodex', 'Leenti', 3, 'H3RP3NN6j');");
        // this up() migration is auto-generated, please modify it to your needs

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
