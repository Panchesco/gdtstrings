# Gdtstrings
A go-to plugin for accessing PHP string functions in ExpressionEngine 3 templates.

##Installation
 * Copy the gdtstrings folder to /system/user/addons
 * Enable in the Add-on manager


## Single Tags

### regexpt
Test if a regular expression is true. 

##### Parameters
- string (required)
- regex (required)

```
{exp:gdtstrings:regexpt string="Short string to check against" regex="/[0-9]{1,}/"} 
```

Returns "1" if true; "0" if false;

---


### slugged

Convert a string to a lowercase alpha-dash string.

##### Parameters 
- string (required)

``` 
{exp:gdtsrings:slugged string="String to make into slug"} 
```
---

### kbytes

Convert bytes to kilobytes

#### Parameters 
- bytes (required)


```
{exp:gdstrings:kbytes bytes="42000"}
```
--- 

### mbytes

#### Parameters 
- bytes (required)

Convert bytes to megabytes

```
{exp:gdstrings:mbytes bytes="42000000"}
```
---

### trunct

Return trunctated version of string.

##### Parameters 
- chars - How many characters to show. Default is 72
- ellipsis - string to use as replacement for truncated text. Default is ...
- str - String to truncate

``` 
{exp:gdtsrings:trunct chars="12" str="Sweet dreams are made of this"} 
```
---

## Tag Pairs

### nl2breakt
Apply PHP nl2br function to text between tags.

```
{exp:gdtstrings:nl2breakt}
Sweet dreams are made of this
Who am I to disagree?			
{/exp:gdtstrings:nl2breakt}
```

### stript
Strip HTML from text between tags

##### Paramters 
- allow  (optional) tags to allow

```
{exp:gdtstrings:stript allow="<br>"}
	<p>Apply PHP strip_tags function to tagdata text.</p>
{/exp:gdtstrings:stript}
```
---

### replact

Replace a string of text wherever it occurs between tags.


##### Parameters 
- needle (required) string to search for
- replacement (optional) replacement string

```
{exp:gdtstrings:replact needle="high-power" replacement="HIGH-POWER"}
 We manufacture high-power lasers.
{/exp:gdtstrings:replact}
```

---

## Change Log
 - 2.1.1 Addition of trunct tag
 - 2.0.0 Updated for EE3
 - 1.1.1 Added nl2breakt tag pair
