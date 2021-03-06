### PHPUnit Example Project
- Einfache Beispiele für PHPUnit Tests
- Parametermöglichkeiten

## Befehle zum ausführen
- gesamte Klasse einfach ausführen ohne SchnickSchnack: 
```bash
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/SampleClassTest.php
```
- gesamte Klasse einfach ausführen mit testdox:
```bash
vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests/SampleClassTest.php
```
- gesamte Klasse mit manueller code coverage, phpunit.xml Config ohne testdox:
```bash
vendor/bin/phpunit --configuration tests/phpunit.xml tests/SampleClassTest.php --whitelist src/ --coverage-html build/phpunit/coverage/
```
- gesamte Klasse mit manueller code coverage, phpunit.xml Config und testdox:
```bash
vendor/bin/phpunit --configuration tests/phpunit.xml tests/SampleClassTest.php --testdox --whitelist src/ --coverage-html build/phpunit/coverage/
```
- nur bestimmte Funktionen mit manueller code coverage, phpunit.xml Config und testdox:
```bash
vendor/bin/phpunit --configuration tests/phpunit.xml tests/SampleClassTest.php --testdox --whitelist src/ --coverage-html build/phpunit/coverage/ --filter "testDoSomethingHiddenFailedIfInputIs(Empty|TooShort|TooLong)$"
```
- gesamte Klasse testen mit einer "kompletten" configuration:
```bash
vendor/bin/phpunit --configuration phpunit\_full.xml tests/SampleClassTest.php
```
