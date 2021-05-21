---
type: inthewild
summary: Mixed content without BiDi support in the terminal
tags: 
  - terminal
  - mangled
permalink: /wild/mixed-content-terminal
image: /inthewild/mixed-content-terminal-sql_rtl_result-atom.png
date: 19 November, 2016
sidebar: auto
prev: /inthewild/
---

# User-generated content in plaintext results (SQL example)

<Tags />

Plain-text SQL results give us an example of the pitfall of displaying multilingual user-generated content. We can learn from this about how to protect and support Bidirectionality when creating user interfaces and applications in general.

A friend sent me a screenshot the other day with a plaintext SQL query and a result in Azerbaijani, and a completely reversed output*, in KDE’s Konsole — a terminal application that supports Bidirectionality:

<div style="text-align:center">

![SQL result that contains Hebrew, presented in KDE Konsole. The Arabic is rendered correctly, but the table is mangled.](/inthewild/mixed-content-terminal-sql_rtl_result-konsole.png)

</div>

::: tip
Note: The SQL examples in this post were slightly adjusted to make sure usernames and the SQL schema is not exposed, but other than that, it is a real example I was sent, from a real-world use.
:::

## What's going on

ome text editors support Bidirectional text (Konsole for Linux, Atom, etc.) and some don’t (GNOME terminal, Sublime, etc.) Usually, we discuss the problems of not supporting Bidirectional text when typing and viewing text — but if not handled correctly, showing Bidirectional text can also lead to some some pitfalls — as in the case of displaying SQL results that include Right-to-Left content.

The Bidirectional algorithm defines how to render Right-to-Left text in a Left-to-Right context, and it does so fairly well. It does, however, define ways to avoid common pitfalls that the algorithm alone can’t know about. With those, it trusts the application developers to implement those safeguards and special wraps to tell the algorithm what to do.

For the most part, the trouble we see with Right-to-Left support (especially online) are about **inappropriate implementation.**

## Brief bidirectionality examples

For example, the algorithm defines that alphabet (script) is (usually) a set of "strong" characters – entities that not only render in their own directionality, but also affect the weak entities that are within them.

Since numbers are weak and script/alphabet is strong, this means that a sentence that contains Right-to-Left script that is followed by numbers, will cause the numbers to render Right-to-Left as well:

| HTML | Result |
| ---- | -------|
|`This is English with a Hebrew date נובמבר 2016.`|This is English with a Hebrew date נובמבר 2016.|

The above makes sense in the general term, and that acts exactly like the Unicode Bidirectional algorithm defines it. If we do want to make the numbers not follow the direction of the previous "strong" characters, we need to isolate them:

| HTML | Result |
| ---- | -------|
|`This is English with a Hebrew date <span dir="rtl">נובמבר</span> 2016.`|This is English with a Hebrew date <span dir="rtl">נובמבר</span> 2016.

The Bidirectional algorithm can’t tell on its own whether the text means the first example or the second, so it gives us the option of isolating what we need and define it ourselves. This is a good idea that is severely underutilized online, especially in the cases of displaying multilingual dates (you can see more about those examples [in my video lectures](./talks/2016-11-02-linux-conf-au).)

## Supporting BiDi with user-generated content

So while this behavior makes sense to implementers and adherents of the Unicode Bidirectionality algorithm, it can create some super confusing results to the user.

Applications that support Bidirectionality (and display Right-to-Left text properly rendered) but display content from services that don’t consider bidirectionality at all can run into problems. Running SQL queries in the terminal, for example, uses the SQL application, which prints out raw data in an ascii table without really caring or knowing about what directionality the data presented has.

In applications that don’t support bidirectionality, Right-to-Left text is printed backwards, which is annoying to Right-to-Left users. Consider the SQL query result below:

<div style="text-align:center">

![SQL result that contains Hebrew, presented in GNOME Terminal. The Arabic is rendered backwards.](/inthewild/mixed-content-terminal-sql_rtl_result-gnome-terminal.png)

</div>

The above renders the ascii table correctly, but the Right-to-Left script is backwards, because GNOME terminal doesn’t support Unicode Bidi behavior. To the Left-to-Right user, this seems perfectly right, but to an Arabic reader, it’s basically unreadable.

What would this look like in an application that does support BiDi, though? Amusingly, no better. Below are screenshots from the same result in Github’s Atom editor and KDE Konsole, both of which support BiDi:

<div style="text-align:center">

![SQL result that contains Hebrew, presented in Atom. The Arabic is rendered correctly, but the table is mangled.](/inthewild/mixed-content-terminal-sql_rtl_result-atom.png)

</div>

<div style="text-align:center">

![SQL result that contains Hebrew, presented in KDE Konsole. The Arabic is rendered correctly, but the table is mangled.](/inthewild/mixed-content-terminal-sql_rtl_result-konsole.png)

</div>
Because the ‘fake_target_url’ in the first result ends with Arabic script (Right-to-Left strong character) it affects the directionality of the weak and neutral characters that come after it — and in this case, all characters after it are either weak (the numbers) or neutral (the pipe) – so that whole section is flipping.

Oy.

## What’s the actual problem?
This isn’t quite the fault of Konsole or Atom, because they’re not really controlling the output that is given to them; as far as either of those are concerned, they are getting a blob of text to display, and they do it correctly, adhering to the Unicode Bidirectional Algorithm.

The problem, however, is that the content that is generated within the SQL query is user-generated (or, in this case, system-generated, but from multi-lingual Wikipedia sites.) This means that liking this or not, we may end up with languages that are Right-to-Left within a context that is the SQL table — a Left-to-Right context.

This is also one of the biggest issues of displaying ascii-structure; when we do that, we basically conflate "structure" with "content" and while it mostly works with Left-to-Right (English-specific) text, it can have really bad results when we handle multiple language content. Luckily, the internet moved past ascii structures, but some applications (like ones that run in the terminal) still use it, and this pitfall serves as a good example to developers on why content should be isolated from structure in their apps.

## So what can be done?
In this specific case, probably not much. The ideal would have been to isolate the content from the structure, but that is a bit complex in plaintext and has issues of its own.

The Unicode Bidirectional Algorithm defines "control characters" that help us tell the algorithm how to behave in a certain situation — to define its context, really, and help it understand when to "fix" its own automatic assumptions.

### Content Isolation
One pair of control characters are the "isolation" rules. Plainly, if you wrap a text with isolation control characters ("FSI", which isolates based on the directionality of the first strong character, and then end it with "PDI") it tells the algorithm that whatever is within that context is "isolated" from the surrounding context. In HTML we do this by the `dir="..."` markup (in FSI’s case, it is `dir="auto"`) but we can’t really do that in plaintext editors, which is where the control character comes in.

So, if we could isolate the data, it would have been displayed correctly. Wrapping the generated pieces of the text with FSI (`\u+2068`) and then PDI (`u+2069`) would have solved our issue.

How feasible is it for SQL to isolate content? I wouldn’t hold my breath. For one, it would mean that all content – plain English or any other language – would have 2 more characters added to each cell, whether it is needed or not. We could try and help SQL recognize if the characters are needed by examining the generated content and judge if it has any non-LTR characters in it, but that’s fairly complex.

No, we’ll probably have to live with this issue in SQL queries. But that doesn’t mean this bug isn’t a useful one to know and understand.

## Developers: Learn from this!
General internet users are probably not going to encounter the ascii-table issue very often, because — at least in the context of internet apps — we (thankfully) present things in a properly structured way and not through ascii- or text-generated structures. But if you’re dealing with creating interfaces, this bug is a good example to remember and keep in mind as a potential serious downfall.

::: tip
It’s usually a good idea to isolate user-generated content in your application.
:::

If you remember anything from this article — remember that.

Until next time, RTL responsibly.

## Thanks

Huge thanks to [Santhosh Thottingal](https://wikimediafoundation.org/wiki/User:Sthottingal-WMF) for sending me the initial screenshot with this cool bug.