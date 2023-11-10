# pbdl - Pretty Basic Directory Listing

Welcome to pbdl - That I named this within 10 seconds.
This was inspired by [h5ai](https://github.com/lrsjng/h5ai) by lrsjng, 
as well as [apaxy](https://github.com/AdamWhitcroft/apaxy) by oupala.

Unlike these great projects, this was really really basic, as well as far less useful.

However, the simplicity also provides some benefits. It doesn't rely on 
shell commands as h5ai, nor it relies on complex `.htaccess` rules like apaxy.
This is just php and some simple `.htaccess` rules which is almost identical 
as the [WordPress](wordpress.org) rules, thus makes it work under very limited 
environments like those free hosting floating around the market.

# Installation

*Works only on Apache or Apache compatiable web servers.*

Grab a copy of this thing:

```
git clone https://github.com/frank-webuser/pbdl.git
```

Then rename the `htaccess.txt` to `.htaccess`.

Due to how is this thing coded as well as my bad coding skills, you **must** 
put the files right inside a document root, and all files you wanted to display 
**must** go inside the `share` folder.

So the final result looks like this:

```
DOC_ROOT
|--- css
|--- share
    |--- This is where you put the files
|--- .htaccess
|--- index.php
|--- other files...
```

Now, visit your site and you'll see the very crude main interface.
Here you can see the following items:

- File name
- File size
- File type

Double click on a file or a folder does what you think it does --- opens it.

If the file was a previewable format (photos, videos, audios, pure text/code, 
as well as webpages), the system will open a preview. Note that the preview is 
based on HTTP, so the file must be publicly available.

If the file was a webpage, no "Download" button will be provided.

# Issues

- Because of how is this thing coded, if there is a index file in a folder,
  it won't load. (Since the actual file is inside, let's say,
  `/share/dir/index.html`, but the displayed path would only be `/dir/`.)
  But maybe, this is good to somebody?
- Putting a folder called `share` inside the actual `share` folder causes
  problems. The reason was explained above.
- No multi language support (Chinese only.). Still learning how to intergrate i18n into php code.
- I'm not an expert in security. Use this at your own risk (for being hacked).

# Possible future updates

Currently this does not have configurations files, I plan to add one so 
users can control the behaviour easily, and change installation path.

Syntax highlighting when previewing codes is also pretty good, already on my 
to-do list. The prism.js shouldn't be hard to implement.
