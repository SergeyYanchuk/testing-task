
all:
	@echo 'you must enter target'

deploy-prod: install-vendor update-vendor prod yii-migrate

deploy-dev: install-vendor update-vendor dev yii-migrate


prod:
	${CURDIR}/src/init --env=Production --overwrite=y

dev:
	${CURDIR}/src/init --env=Development --overwrite=y


install-vendor:
	composer install -d src

update-vendor:
	composer update -d src

yii-migrate:
	php ${CURDIR}/src/yii migrate/up --migrationPath=@console/migrations --interactive=0

yii-migrate-create:
	php ${CURDIR}/src/yii migrate/create default