# Invisible Spam Protection

## Maintainers

 * Marijn Kampf (Nickname: marijnkampf)
  <marijn at exadium dot com>
   
   http://www.exadium.com/tools/silverstripe/modules/invisible-spam-protection-module/
   
   Sponsored by Exadium Web Development
   
## Introduction

Very simple anti spam protection based on principle that automated spammers enter bogus information in all form fields.

Field is added to form that is hidden using CSS hiding it from human users.

Form is only allowed to be submitted if field is empty.

Includes an EditableInvisibleSpamField to integrate with the UserForms module. 

## Requirements

 * Spam Protection
 * SilverStripe 3.#

## Install Spam Protection Module

The Spam Protection Module (http://silverstripe.org/spam-protection-module) provides the basic interface for managing the spam protection.
If your are not using composer to manage your dependencies , you have to install this module manually. 


## Setting up InvisibleSpamProtection

### With composer (recomended)

Add this to your composer.json:

```js
{
    "require": {
      "exadium/silverstripe-invisible-spam-protection": "dev-master"
    }
}
```

or execute the following command

```composer require "exadium/silverstripe-invisible-spam-protection"```

to install the module. If you have set your minimum-stability to stable, you may need to install the spam-protection-module explicitly:

```
composer require "silverstripe/spamprotection": "1.0.x-dev"
```


### without composer (traditional way)

 Download the module and extract it, into a folder which should be named InvisibleSpamProtection.
 
## Enable the Module ##
Yml configuration add to your config.yml file or create spamprotection.yml with the following:
```
---
name: spamprotection
---
FormSpamProtectionExtension:
  default_spam_protector: InvisibleSpamProtector
```

Or enable anti spam in mysite/_config.php by adding line 

```
SpamProtectorManager::set_spam_protector('InvisibleSpamProtector');
```
