<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250620075536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glace ADD cone_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace ADD CONSTRAINT FK_A6DD185F6D6AE6B6 FOREIGN KEY (cone_id) REFERENCES cone (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A6DD185F6D6AE6B6 ON glace (cone_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE glace DROP FOREIGN KEY FK_A6DD185F6D6AE6B6
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A6DD185F6D6AE6B6 ON glace
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE glace DROP cone_id
        SQL);
    }
}
