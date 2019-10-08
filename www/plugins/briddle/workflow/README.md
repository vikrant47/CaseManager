In the past, developers have generated a Cron entry for each task they need to schedule. 
However, this can sometimes be a headache. Your task schedule is no longer in source control, 
and you must SSH into your server to add the Cron entries. The command scheduler allows you to 
fluently and expressively define your command schedule within the application itself, and only 
a single Cron entry is needed on your server.

Workflows open up this command schedule for generic purposes (send mails, ping URL's).

###Workflows
Workflows are a set of **rules** that allow **triggers** (inside your own code, by an event or from a cronjob) to automate a series of **actions** (send mails, ping URL's).


###Rules
All rules consist of a **trigger** and an **action**. 
You can de-activate a rule or chain multiple rules together (taking care not to create loops!).

Every rule has a **CamelCased** identification code. Make it descriptive!


###Triggers
All triggers consist of a **type** (cronjob, event, manual) and an optional **value**. 
Triggers can be reused in multiple rules.

You can call any trigger like this:

    use Briddle\Workflow\Models\Rule;
    $rule = New Rule;
    $rule->triggerRule('CamelCasedRuleName');

Triggers of the type **cronjob** are triggered automagically and the value of cronjobs consist of 
5 numbers that are seperated by spaces (you can also use * to include all options for the entry).

1. Entry: **Minute** when the process will be started [0-60 or *]
2. Entry: **Hour** when the process will be started [0-23 or *]
3. Entry: **Day of the month** when the process will be started [1-28/29/30/31 or *]
4. Entry: **Month of the year** when the process will be started [1-12 or *]
5. Entry: **Weekday** when the process will be started [0-6 or *] (0 is Sunday)
 
For scheduled tasks to operate correctly, you should add the following Cron entry to your server.

    php-cli -q /path/to/artisan schedule:run >> /dev/null 2>&1


###Actions
All actions consist of a **type** (mail,webhook) and a **value**.
This value can be a full URL (in case of a webhook) or a raw SQL select query (in the case of an automated mailing).
Actions can be reused in multiple rules.

Every action has a identification code (**lowercase** and **without spaces**). Make it descriptive!
In the case of mailings the identification code for the action also corresponds to the **code** for a mail template and
the database record is available within the mail template (e.g. `{{ name }}`)


###Examples
To **email** admins if they are inactive for more then a week:
1. Create a trigger of type **cronjob** and specify a **value** for the cronjob
2. Create an action of type **mail** and make sure you setup a mail template using the identification code of the action.
3. The Action value is a query that should return an array of objects and has to include the properties **email** and **name** (as they will be used for sending the mails). This array is also available in the mail template.

    `SELECT email as email, first_name as name FROM backend_users WHERE is_activated=1 AND last_login < DATE_SUB(NOW(), INTERVAL 1 day)`
    
To **ping a URL** (e.g. after making a payment)
1. Create a trigger of type **manual**
2. Create an action of type **webhook**
3. The Action value is the URL you want to ping (e.g. `https://mysite.com/webhook`)
4. Call the trigger in your own code (e.g. within the onStart() function in the code section of a page)
 
Send an email (e.g. when a new user registers)
1. Create a trigger of type **event** and specify a **value** for it (e.g. rainlab.user.register)
2. Create an action of type **mail** and make sure you setup a mail template using the identification code of the action.
3. The Action value is a query that should return an array of objects and has to include the properties **email** and **name** (as they will be used for sending the mails). This array is also available in the mail template.

To **ping a URL** (e.g. after registration)
1. Create a trigger of type **event** and specify a **value** for it (e.g. rainlab.user.register)
2. Create an action of type **webhook** 
3. The Action value is the URL you want to ping (e.g. a webhook at IFTTT.com) 


###Permissions
As always you can set permissions for this plugin in **Settings > Administrators**