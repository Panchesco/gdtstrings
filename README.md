# Gdtstrings
A go to plugin for when we need access to PHP string functions in templates.


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

Replace a string of text whereever it occurs between tags.


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

 - 1.1.1 Added nl2breakt tag pair
