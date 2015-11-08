# @@name
### [Project Page](@@homepage)

@@description



### Installation:

After git checkout run
```
npm install
```
Now you can run the default **grunt**-task to build the WordPress plugin `@@textdomain/@@textdomain/` and the uploadable ZIP-archive `@@textdomain/@@textdomain.zip`.

Do only edit files stored in `@@textdomain/source/`.



### Overview:

#### email (@@textdomain_email_func)
**Usage**
* ```[email=mail@example.com/]```
* ```[email]mail@example.com[/email]```
* ```[email mailto=mail@example.com]Linktitle[/email]```

**Output**
* ```<a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#109;&#97;&#105;&#108;&#64;&#101;&#120;&#97;&#109;&#112;&#108;&#101;&#46;&#99;&#111;&#109;">&#76;&#105;&#110;&#107;&#116;&#105;&#116;&#108;&#101;</a>```

#### int (@@textdomain_internallink_func)
**Usage**
* ```[int id=12]```
* ```[int id=12 name="Linktitle"]```
* ```[int id=12 name="Linktitle" class="clasname"]```

**Output**
* ```<a href="http://url../" id="int-12" class="int-link type-page page-about classname" title="about" data-slug="about">Linktitle</a>```



### Author & Copyright:

Copyright (c) @@author



### License:

@@license @@license_version
@@license_url