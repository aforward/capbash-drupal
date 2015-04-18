capbash-drupal
==============

Scripts for installing [drupal](https://www.drupal.org/) an open source content management platform powering millions of websites and applications.

# How to Install #

Install capbash first, more details at:
https://github.com/capbash/capbash

```
curl -s https://raw.githubusercontent.com/capbash/capbash/master/capbash-installer | bash
capbash new YOUR_REPO_ROOT
cd YOUR_REPO_ROOT
```

Now you can install drupal into your project

```
capbash install drupal
```

# Configurations #

The available configurations include:

```
DRUPAL_VERISON=${DRUPAL_VERISON-7.23}
ACCESS_CODE=${ACCESS_CODE-pp}
```


# Deploy to Remote Server #

To push the drupal script to your server, all you need if the IP or hostname of your server (e.g. 192.167.0.48) and your root password.

```
capbash deploy <IP> drupal
```

For example,

```
capbash deploy 127.0.0.1 drupal
```
