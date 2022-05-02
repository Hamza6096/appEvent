<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502121427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_list_by_events ADD events_id INT DEFAULT NULL, ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_list_by_events ADD CONSTRAINT FK_36128BB29D6A1065 FOREIGN KEY (events_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE user_list_by_events ADD CONSTRAINT FK_36128BB267B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_36128BB29D6A1065 ON user_list_by_events (events_id)');
        $this->addSql('CREATE INDEX IDX_36128BB267B3B43D ON user_list_by_events (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_list_by_events DROP FOREIGN KEY FK_36128BB29D6A1065');
        $this->addSql('ALTER TABLE user_list_by_events DROP FOREIGN KEY FK_36128BB267B3B43D');
        $this->addSql('DROP INDEX IDX_36128BB29D6A1065 ON user_list_by_events');
        $this->addSql('DROP INDEX IDX_36128BB267B3B43D ON user_list_by_events');
        $this->addSql('ALTER TABLE user_list_by_events DROP events_id, DROP users_id');
    }
}
