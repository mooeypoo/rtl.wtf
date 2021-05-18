# Intro to the Bidirectional Algorithm

English is written left to right. Hebrew is written right to left. We know that. Browsers (for the most part) know that too, just like they know that the default directionality of a web page is left-to-right (LTR), and that if there is a setting that explicitly defines the direction to right-to-left, the page should flip like a mirror. Browsers are smart like that. Mostly.

But even browsers have problems when deciding what to do when languages are mixed up, and that, my friends, is a recipe for really weird issues when typing and viewing bidirectional text.
<!-- more -->

## On The Bidirectionality of Characters and Strings

Before we delve into some interesting examples of mixed-up directionality problems, we should first go over how browsers consider directionality at all.

We already said that English is recognized as an "LTR" language (Left-to-Right), and Hebrew, Arabic, Urdu (and some others) as RTL languages (Right-to-Left). These are fairly clear, and if you type a string that consists of these languages on their own, the situation is more or less okay (but we'll go over some issues with that later)

But not all characters in strings are equal.<a href="#languagescript">**</a>

Hebrew and English (and a couple of others) are of the "strong" directionality types, the ones that not only have direction but also affect their surroundings. Some characters have "weak" directionality, where while they have directionality internally, they don't affect characters around them. And some characters are merely neutral, whereas they get their directionality by their surroundings. Oh, and there are also some characters that may (and do) flip around visually depending on the text they're in.

<div style="text-align:center">

![A man crying on the floor](./crying_facepalm_house_of_cards1.gif)

</div>

Don't worry. I'm going to explain eeeeeeeeeeeeeeverything.

Almost.

Kinda.

Well, I'm going to try, so just keep reading.

## Character Directionality Types

Unicode, which is the encoding system most common online, [defines character type directionality for groups of characters](http://www.unicode.org/reports/tr9/#Bidirectional_Character_Types) as either "strong", "weak" or "neutral". These types control how these characters are presented inside a string.

::: tip
**Blast from the Past:**

In the beginning days of the Internet, way way back, when Dinosaurs roamed the Earth and half of you who are reading this post were probably in diapers, the Internet assumed pretty much everything is left-to-right.

I remember building web pages in raw html that most of us would cringe at today. There were no "sites", really, only a collection of static HTML pages which, more often than not, included horrendous tags like `<blink>` and `<marquee>` and featured pages where one-font-served-all and the backgrounds were tiled. Ah, the good ol' days.

Those days, Hebrew was, in fact, typed backwards. If I wanted to write the Hebrew word "שלום", which starts with the hebrew letter "ש", I would have to type it backwards, starting with the letter "ם", and produce "םולש" &mdash; because the letters would appear sequentially from left to right. This might be doable when typing one or two words, but if you had an entire paragraph or an entire article, it could get very annoying very fast.

There were several tools you could download in those ancient days that would take your text and flip it. 'Cause that's how we rolled back then.

Luckily, Unicode came in and defined directionality, and while it still has some problems, RTL users can at least type their language normally, rather than learn to write backwards. That helps.
:::

### Strong Types

Strong types are character sets that have explicit directionality. Hebrew is right-to-left, always. English is left-to-right, always.<a href="#languagescript">**</a> When I type in either of those character-sets, my characters would appear in sequence, one after the other, according to the directionality. This is how the word "Hello" appears from left to right, while the word "שלום" appears from right to left.

Strong types also set the directionality of the space they're in, meaning that if I inserted any characters that have weak or neutral directionality in the middle of the sentence you're reading now (and I have already done that) they will assume the direction of the strongly typed string &mdash; in this case, English. So, <span style="text-decoration: underline;">strong type isn't just about the character itself, but also its surroundings</span>.

### Weak types

Weak types are fun. These are sequences of characters that might have a direction, but it doesn't affect their surroundings, and may be adjusted based on their surrounding text. In this group are characters like numbers, plus and minus signs, colon, comma, period and other control characters.

According to the Unicode bidirectionality algorithm specifications, [weak types resolve according to the previous characters](http://www.unicode.org/reports/tr9/#Resolving_Weak_Types).

### Neutral types

Neutral types are the funn'est. Neutral characters are character types that can be either right-to-left or left-to-right, so they completely depend on what string surrounds them. These include things like new-line characters, tabs and white-space.

According to the Unicode bidirectionality algorithm specifications, [neutral types resolve their directionality according to the surrounding text](http://www.unicode.org/reports/tr9/#Resolving_Neutral_Types).

### Implicit Level Types: When what you type is not quite what you get

So we have strong types, weak types and neutral types, but that's not where our directionality double-take ends. In fact, the real doozies are characters that are resolved differently (as in, they take literally different shapes) in either RTL or LTR.

Yes, you read that right, they actually literally and quite visibly look different when written inside an LTR string versus inside an RTL string.

The best examples for this are parentheses and (my personal best friend) the bracket. These symbols are, in fact, icons that represent direction already. The button on your keyboard that has "(" on it is not quite that, but rather a symbol of "open parentheses". In English (which is left-to-right) the symbol is naturally ( to open parentheses, and ) to close them. But in Hebrew and Arabic and the other RTL languages, the "open parentheses" symbol is the reverse ), since the string is right to left. So this symbol would appear on your screen either ( or ) depending where you typed it.

<div style="text-align:center">

![Bill and Ted saying whoa](./bill_ted_whoa.gif)

</div>

I know, right?

## Mishmashing Both Ways

In general, if one uses only one direction in a document (specifically online) the problems are not as noticeable, because the strongly typed text surrounds all other weak and implicit-level character types, making them its own type by default.

The issues come up when we have to mix languages and directions, or use RTL language inside a block that is meant for LTR. This happens a lot online &mdash; if there is no explicit `dir="rtl"` anywhere in the HTML document, the document defaults to LTR directionality. The directionality of the page (either by using `dir='rtl'` or `dir='ltr'` or not using `dir=` attribute at all and relying on its default fallback to 'LTR') is considered to explicitly set the directionality of the expected text. So, any characters of ambiguous directionality will take on the direction that was set by that attribute.

If, say, I try to type an RTL language inside a textbox in a page that has dir='ltr', I can run into a lot of annoying problems with punctuation, the positions of segments of the sentence, and mixing languages of a strong type. The same happens the other way around, if I try to type an LTR language (Say, English) inside an RTL-set textbox.

It can get so confusing, that, quite often, as I try to figure out how to type LTR text into an RTL box and see how my text actually organizes itself, my state of mind is pretty much this:

<div style="text-align:center">

![Neil DeGrasse Tyson making an confused and unsure gesture](./i_dont_even_ndt-1.gif)

</div>

## The Good, The Bad, and The Ugly

So, obviously, the creation of Unicode was much superior to the reverse-typing (and the need to use multiple individual fonts) that existed before it. Browsers tend to follow the Unicode rules (though some apps that do their own rendering sometimes don't, but that's a different issue.) And this Unicode directionality algorithm gives us a lot of really Good Things to work with when typing different directions, but it also has so Bad Things, and occasionally, even some really Ugly Things.

### The Good Things

There are, indeed, a bunch of good things that happen due to Unicode's bidirectionality algortithm. As I've already mentioned, the fact RTL users can type their language normally (and not backwards) is already a good thing (and I know, I used the system when it didn't have that nice feature.)

Some other benefits of the bidirectionality algorithm is the fact we can use numbers (which are weakly typed LTR) inside RTL text. So, for instance, consider this text:

<p>ניפגש ב09:35 בחוף הים</p>

Literally, this means "we will meet at 09:35 at the beach". Notice, though, that even without any directionality fixes the numbers 09 and 35 are left-to-right as they should be, because that's how numbers are read &mdash; but I didn't really need to manually reverse my typing when I wrote this sentence &mdash; the browser did it for me.

Here's a nice exercise though: select that sentence. When you do, you can see exactly what piece has what directionality.

Which leads me to&mdash;

### The Bad Things

#### Selections

Selections are a major part of the problem of bidirectional text. As you can see from the example of the "good thing" (that I don't need to reverse typing) there is also a bad side, which is how to select my text. Selection can be LOGICAL or VISUAL. This is also true to cursor movement, which we will go over in a second.

**Visual** selection is simply that &mdash; visual &mdash; which means that the selection treats the segment of text as if it's one continuous block, regardless of directions.

**Logical** selection means the text is divided to its bidirectional pieces. That means that if I start my selection at the beginning of an RTL text (at the right) and drag my mouse towards its end (to the left) the selection will split when I reach the number part, because the numbers are left-to-right.

This is, indeed, logical, because it goes from logical "start" to logical "end", and since the text is bidirectional, those two pointers are different for each of the sections. It makes a lot of sense, but it can be confusing.

#### Cursor Movement

Similarly, the cursor can also move either logically or visually. This can be a little confusing, and sometimes this behavior is inconsistent across platforms. Most of the time, though, the movement is logical.

So, here's a quick test of where this behavior can become really weird. Consider the following sentence. It is inside a textbox so you can select it and move your cursor within it properly.

<textarea style="width: 95%;">I can write English with מילים בעברית in the same sentence.</textarea>

Try to select the text from the start (left) to the end (right). See what happens when you hover over the Hebrew words?

Now, if you move your marker inside the given textbox, the cursor (in Chrome and Firefox in Windows, at least) will move VISUALLY and not logically. That is, you can just move from end to start as if there are no two different languages there.

But try to copy/paste this string into Notepad (or equivalent simple software) and move the cursor from start to end. Usually, those editors would move the mouse LOGICALLY. Which, to be fair, makes more sense than visual movement.

It also shows you how RTL behavior can be somewhat unpredictable; some programs do it this way, some that way. Some browsers will go visual, some logical, and there are some CSS rules that can override those decisions, too, so it may change on a website to website basis.

Nice, eh?

#### Punctuation Marks

Well, that was a textbox that was "LTR" to begin with. What happens, though, if I write a Hebrew sentence in an LTR box, or the other way around &mdash; an English sentence in an RTL textbox? That's when our lovely friends &mdash; the weakly typed punctuation marks &mdash; come out to play.

<textarea dir="rtl" style="width: 95%;">This is an English sentence inside an RTL textbox. The first sentence ends with a period. So is the second and the last one.</textarea>

Whoops, where's the final period?

Here's the reverse version:

<textarea dir="ltr" style="width: 95%;">זהו משפט בעברית בתוך קופסת טקסט משמאל לימין. המשפט הראשון נגמר בנקודה. כך גם המשפטים השני והשלישי.</textarea>

Where'd **that** final period go?

<div style="text-align:center">

![Spock raising a single eyebrow](./intriguing_spock.gif)

</div>

#### Two languages together, Koombaya

Here's something even better, though, that relates to both selections and cursor movement (and rendering, and usage, and and &mdash; anyways).

The above examples featured some strong type (English or Hebrew) that is mixed with some weak typed (numbers) and is mixed up by the neutral type (white space). But what if I create a string that has two opposite strong types mixed with neutral type white-spaces and weak type punctuation?

Go ahead, try to select that sentence from beginning to end:

<textarea dir="rtl" style="width: 95%; height: 80px;">Remember that English is strongly typed for LTR but עברית is strongly typed for RTL. When mixing English ועברית together you may get some surprising results.</textarea>

Or the reverse:

<textarea dir="ltr" style="width: 95%; height: 80px;">עכשיו המשפט כולו הוא בעברית עם מילה in English פה ושם. זה בדיוק הפוך לדוגמא למעלה שבה English היא השפה השולטת.</textarea>

<div style="text-align:center">

![Men with gaping mouths](./sam_dean_whoa.gif)

</div>

_(Hat tip to [Amir Aharoni](https://www.mediawiki.org/wiki/User:Amire80) for this one)_

Let's go over what goes on in that horrific textbox for a minute. First of all, part of the problem in the first textbox is that the textbox was forced RTL, and since most of the text in it was English, it broke in weird places. Here's the sentence when it is forced to be LTR:

<div class="box-note">Remember that English is strongly typed for LTR but עברית is strongly typed for RTL. When mixing English ועברית together you may get some surprising results.</div>

<em>Notice, though, that the textbox problem also happened just the same in the reverse case, where the box was LTR and the sentence was mostly RTL.</em>

With a forced-RTL textbox (and majority of text strongly typed for LTR) the spaces took the directionality of the text they were surrounded by &mdash; which is LTR. Then we had a strongly-typed RTL word in Hebrew, which made the space inside it turn RTL, but the surrounding white space (the one between the RTL word and LTR sentence) was still affected by the surrounding text &mdash; which is LTR.

If you're still with me here, this may help drive the point home. Essentially, you had this:

<div dir="rtl">[ENGLISH_CHUNK 3] hebrew [ENGLISH_CHUNK 2] hebrew [ENGLISH_CHUNK 1]</div>

The entire sentence structure was right-to-left, but the small English segment was left-to-right.<br />
Overall "chunk" direction was RTL. Each chunk had its own internal direction. When you read it, it looks all jumbled &mdash; because it is.

And that happened exactly the same (only in reverse) in the second textbox. With LTR instead of RTL, and vice versa.

<div style="text-align:center">

![Nathan Fillion frustrated, giving up](./nevermind_nathan_fillion.gif)

</div>

I know. I... know.

### The Ugly Things

Now we move to the ugly area, the things that are not just difficult behavior, but are also producing visually different results. Remember those weak typed and implicit-level types? That's where these come in, and they, I tell you, they have a blast confusing us thoroughly.

#### White Spaces

White spaces are implicit-level types, which means they are defined by the text they live in. The spaces in the sentence you're reading right now are implicitly LTR, since they are inside an English text. The white spaces here:

במשפט הזה יש רווחים ואלה מוגדרים ימין לשמאל

Are implicitly RTL because they're inside hebrew, even though the page itself is LTR.

This is good, but it also produces some weird results. Consider the situation where I have a set of numbers inside a text. The numbers are separated by whitespace &mdash; and the whitespace is defined by the surrounding text. But numbers themselves are "weak" typed &mdash; which means they do not affect their own surroundings (even though they are internally LTR) The whitespaces would have to take their directionality from whatever words surround **the entire segment of numbers.**

This sounds weird? The behavior is even weirder. See this, for instance:

<textarea style="width: 95%;">Start 11 22 33 44 55 66 77 88 99 100 End</textarea>

I purposefully encapsulated those numbers in an RTL text, and so the whitespaces that separate these are still LTR. What do you think would happen, though, if I replace those english words with Hebrew (RTL) ones?

Well, this example is exactly the same sentence and sequence of numbers, in the same exact order, with the single difference that "Start" and "End" were replaced by their prospective Hebrew words.

<textarea style="width: 95%;">התחלה 11 22 33 44 55 66 77 88 99 100 סוף</textarea>

The numbers are reversed! The numbers... are... Head spinning yet?

This might be weird, but it makes sense; the spaces are now encapsulated in an RTL text which means they are now RTL. The space in rtl sentences is right-to-left, so the grouping of numbers go from the right and to the left.

But I think your head isn't spinning fast enough just yet. What would happen if we added spaces inside the number grouping itself? I mean, the numbers are internally LTR, but the space is RTL, so we will add a space to break the group and.. and the group will go... spinning?

Try it. Add a spaces to the number groups below.

<textarea style="width: 95%;">התחלה 12345 67890 סוף</textarea>

See it? SEEEEEEEEEE it?

<div style="text-align:center">

![Neil Patrick Harris performing a "mind blown" gesture](./mind_blown_nph.gif)

</div>

Yeah. Exactly.

#### Parentheses and Brackets

As we discussed earlier in this post, brackets and parentheses are, in fact, representing "start-of" and "end-of" which means that depending where they are inserted, they may appear on different directions on your screen.

So, if I press the button that has a nice little "[" on it on my keyboard (below the { and near the P) I will get different results in LTR and RTL.

This means that this code produces these results:

| Directionality | HTML | Result |
| -------------- | ---- | ------ |
| LTR | `<span dir="ltr">`[`</span>` | <span dir="ltr">[</span> |
| RTL | `<span dir="rtl">`[`</span>` | <span dir="rtl">[</span> |

Yes, I clicked the same button on the keyboard. Yes, I'm sure. You're welcome to go over the source.

These aren't the only brackets that act this way, too. Here:

**Parentheses:**

| Directionality | HTML | Result |
| -------------- | ---- | ------ |
| LTR | `<span dir="ltr">`(`</span>` | <span dir="ltr">(</span> |
| RTL | `<span dir="rtl">`(`</span>` | <span dir="rtl">(</span> |
| LTR | `<span dir="ltr">`)`</span>` | <span dir="ltr">)</span> |
| RTL | `<span dir="rtl">`)`</span>` | <span dir="rtl">)</span> |

**Curly brackets:**

| Directionality | HTML | Result |
| -------------- | ---- | ------ |
| LTR | `<span dir="ltr">`{`</span>` | <span dir="ltr">{</span> |
| RTL | `<span dir="rtl">`{`</span>` | <span dir="rtl">{</span> |
| LTR | `<span dir="ltr">`}`</span>` | <span dir="ltr">}</span> |
| RTL | `<span dir="rtl">`}`</span>` | <span dir="rtl">}</span> |

**Angle brackets:**

| Directionality | HTML | Result |
| -------------- | ---- | ------ |
| LTR | `<span dir="ltr">`&lt;`</span>` | <span dir="ltr">&lt;</span> |
| RTL | `<span dir="rtl">`&lt;`</span>` | <span dir="rtl">&lt;</span> |
| LTR | `<span dir="ltr">`&gt;`</span>` | <span dir="ltr">&gt;</span> |
| RTL | `<span dir="rtl">`&gt;`</span>` | <span dir="rtl">&gt;</span> |


Yeah. It's great.

More than being a weird thing, this effect makes it incredibly frustrating when, inside an RTL textbox, there's a need to add some html &lt;tags&gt;. And, yes, this happens in Wikipedia, and in the RTL Wikipedias too.

Try adding a `<span style="font-size: 2em">` to some segment of the text below. Good luck, stay sane, and remember to breathe. If you feel especially adventurous, you could also try to insert some wikitext, like a link to a page "Somewhere" (english link) with a hebrew caption.

Want to go even wilder? Add some English text after the Hebrew one, and try to set some `<a href="something.html"> </a>` starting from the Hebrew string, and ending at the English one.

Type it all, don't cheat and copy/paste. Try it for realz. Go ahead, play. Experiment. Go RTL crazy.

<textarea dir="rtl" style="width: 95%;">הרי לכם משפט בעברית. האם אפשר להוסיף למשפט הזה תגיות HTML בלי להשתגע?</textarea>

<div style="text-align:center">

![Eddie Murphy peeking through a door, looks around, and immediately closes it in disgust](./wtf_eddie_murphy.gif)

</div>

## But wait, There's more

There's a bunch of other issues with bidirectional text, some of which are problems that exist in published software and apps online and make RTL'er's lives rather annoying. I may write about that at some point, and share my RTL frustration.

In this article we went over issues with RTL strings inside LTR boxes, problems with characters of ambiguous directionality, with selections and cursor movements and general "huh"isms. There are, of course, more RTL hardships, but this post was meant to serve as a sort of introduction to the main and most common bidirectionality issues.

I hope you've enjoyed it. At least, I hope you now understand what the programmers (and RTL users!) need to deal with. I tried to make it easier on you with some animated gifs. You're welcome.

**And so, until next time: !oo-eldoot**

<a name="languagescript"></a>

## Remark Regarding Languages and Scripts

In this article, I use the term "Language" to refer to English and Hebrew letters. In fact, I should be using the term "Script", to refer to the letters and characters themselves. The difference comes mostly from the fact that while Hebrew and English are languages, they each use characters that may be used in other Languages. For instance, English uses latin script, and Hebrew script can be used in Yiddish language as well.

So, take into account that this is the case, and that the actual letters that are used and are LTR or RTL are really "script" and not quite the language &mdash; since the browser doesn't really care what words you literally type using these scripts.

For the sake of simplicity and to try and reduce some of the confusion, however, I made a tactical decision to group it all up to the most familiar terminology of "Language".

::: tip
**Note:** This article was [reposted from the original post that started this whole idea for this site](http://moriel.smarterthanthat.com/tips/the-language-double-take-dealing-with-bidirectional-text-or-wait-tahw/). It also appeared on [opensource.com](https://opensource.com/life/16/3/twisted-road-right-left-language-support)
:::

_(Thanks MatmaRex for pointing out I should at least mention this difference)_

## Useful Links

* [Unicode Bidirectional Algorithm official report](http://www.unicode.org/reports/tr9/)
* Blast from the 90s #1: [Hebrew/English web fonts for Windows 3.1](http://www.rannet.com/help/fonts.html)
* Blast from the 90s #2: [Tools to write and read Hebrew online](http://www.morim.com/tools.html)
* _All animated gifs in this post are taken from [www.reactiongifs.us](https://www.reactiongifs.us/)_
