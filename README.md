[![codecov](https://codecov.io/gh/vlad-ko/app-stripe-test/branch/master/graph/badge.svg?token=MP5E9BNSOU)](https://codecov.io/gh/vlad-ko/app-stripe-test)

# Laravel 5.4 app, for working with Stripe API

# Installation instructions 

I presume that you have Laravel's Homestead working, or can run 
a Laravel app in your local environment.

First clone the repo from github. 
(Example uses home directory for setup).

```
cd ~
git clone git@github.com:vlad-ko/app-stripe-test.git
```

To setup Homestead, add the following to your Homestead.yaml file...

under "folders":
```
- map: ~/app-stripe-test
  to: /srv/app-stripe-test
```

under "sites":
```
- map: app-stripe-test.local
  to: /srv/app-stripe-test/public
```

Lastly, edit your ```/etc/hosts``` file (or the one for your OS).
```
192.168.10.10    app-stripe-test.local
```
The above IP address is the default Homestead (vagrant),
if you are using a different one, please adjust accordingly.

Once these basic setting are in place you can proceed to ```vagrant up```.
(You may need to vagrant halt; vagrant up; for the mappings to take effect);

You will need to ssh into the vagrant server to run a few setup commands.
Change to your working app directory and run ```composer update```.

```
cd /srv/app-stripe-test
composer update
```
Once all the necessary dependencies are pulled down, let's setup the ```.env``` file.
You will have to ```cp .env.example .env```
Please make sure that database credenitals are in there and you have the right database name listed.
And Stripe API key must be added (just another line in the file): ```STRIPE_API_KEY=your_test_key_here```

Finally, in the same directory run: ```php artisan migrate``` to setup the DB.
(You should see a copuple of tables created).

To pull down some initial data you may use: ```php artisan stripe:charges 50```.
(The number after the command name is the limit of records, and defaults to 10).

If all goes well, the output should be something like:
```
[2017-04-09 14:12:31] - Total records processed: 16
````
