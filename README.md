# Howto
  1. Create your own project's MySQL (empty) database
  2. Clone this repository
  3. Set up app/cache and app/logs directories permissions ([Configuration and Setup (The Symfony Book)](http://symfony.com/doc/current/book/installation.html#configuration-and-setup))
  4. Update your vendor dependencies (via *Composer*)
  5. Tell Doctrine to update your database schema
  6. Import the [MySQL test data](src/Estei/AppBundle/Resources/db/sf_eval_data.sql.gz)
  

  [![Build Status](https://travis-ci.org/Profesor-Bruscia/Symfony-Eval.svg)](https://travis-ci.org/Profesor-Bruscia/Symfony-Eval)