# Mediaberger_Shortcodes
### [Project Page](https://github.com/mediaberger/mediaberger_shortcodes)

A WordPress Plugin providing common used Shortcodes



### Installation:

After git checkout run
```
npm install
```
Now you can run the default **grunt**-task to build the WordPress plugin `mediaberger_shortcodes/mediaberger_shortcodes/` and the uploadable ZIP-archive `mediaberger_shortcodes/mediaberger_shortcodes.zip`.

Do only edit files stored in `mediaberger_shortcodes/source/`.



### Overview:

#### email (mediaberger_shortcodes_email_func)
**Usage**
* ```[email=mail@example.com/]```
* ```[email]mail@example.com[/email]```
* ```[email mailto=mail@example.com]Linktitle[/email]```

**Output**
* ```<a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#109;&#97;&#105;&#108;&#64;&#101;&#120;&#97;&#109;&#112;&#108;&#101;&#46;&#99;&#111;&#109;">&#76;&#105;&#110;&#107;&#116;&#105;&#116;&#108;&#101;</a>```

#### int (mediaberger_shortcodes_internallink_func)
**Usage**
* ```[int id=12]```
* ```[int id=12 name="Linktitle"]```
* ```[int id=12 name="Linktitle" class="clasname"]```

**Output**
* ```<a href="http://url../" id="int-12" class="int-link type-page page-about classname" title="about" data-slug="about">Linktitle</a>```



### Author & Copyright:

Copyright (c) Christian Hockenberger <mail@mediaberger.com>



### License:

GNU General Public License v2 or later
http://www.gnu.org/licenses/gpl-2.0.html