set dotenv-load := false
PHPUNIT := 'vendor/bin/phpunit -d xdebug.max_nesting_level=250 -d memory_limit=1024M --coverage-html reports/'

# [DDEV] Initial project setup
setup:
	cp .env.example .env
	ddev start
	ddev composer install

# [DDEV] Run the application (after initial setup)
up:
	ddev start

# [DDEV] Stop the application
down:
	ddev stop

# [DDEV] Enter webserver bash
@ssh:
	ddev ssh

# [DDEV] Lint files
@lint:
	ddev exec "./vendor/bin/ecs check --fix"
	ddev exec "./vendor/bin/php-cs-fixer fix"
	ddev exec "./vendor/bin/rector process"

# [DDEV] Run unit and integration tests
@test:
	echo "Running unit and integration tests"; \
	ddev exec {{PHPUNIT}}

# [DDEV] Run tests and create code-coverage report
@coverage:
	echo "Running unit and integration tests"; \
	echo "Once completed, the generated code coverage report can be found under ./reports)"; \
	ddev xdebug;\
	ddev exec XDEBUG_MODE=coverage {{PHPUNIT}};\
	ddev xdebug off
	xdg-open reports/index.html
