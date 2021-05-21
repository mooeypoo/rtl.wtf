---
type: inthewild
summary: Unencapsulated BiDi text mangles subject lines in Gmail
tags: 
  - mangled
  - mobile
permalink: /wild/mangled-subject-gmail
image: /inthewild/mangled-subject-gmail-gmail-inbox-rtl-bidi-mobile-arrows.png
date: 11 March, 2016
prev: /inthewild/
sidebar: auto
---

# Mangled bidi subject on Google mobile app

Apparently, Gmail on mobile could use some Bidirectional isolation when displaying email subject lines.

Earlier today, I’ve received an email from a travel website I signed up to a while back, inviting me to check out prices for trips to Jerusalem. Here is the email on Gmail desktop (Chrome):

<div style="text-align:center">

![Better English/Hebrew subject line from Gmail on Desktop (Chrome)](/inthewild/mangled-subject-gmail-gmail-inbox-rtl-bidi.png)

</div>

The sentence literally reads “Moriel, the prices in Jerusalem are of the lowest we’ve seen in the past 4 days.” Except, the entire sentence is in Hebrew and the username is in English.

Depending on where you paste this sentence, you would expect different presentations – but none would make you expect what we see in Gmail mobile on Android:

<div style="text-align:center">

![Mangled Hebrew/English subject line from Gmail app on Android](/inthewild/mangled-subject-gmail-gmail-inbox-rtl-bidi-mobile.png)

</div>

Yikes!

This screenshot shows one of the more amusingly broken sentences I’ve seen lately. I mean, look at the `[inbox]` tag. What is it doing in the middle of the sentence?

## What went wrong?

This sentence already has a high potential for appearing jumbled, since it starts with an English word (LTR), but includes all-Hebrew sentence (RTL) with numbers. Some systems (like Facebook status) will assume the entire text is LTR just because it started with an English word. Hangouts on desktop, however, would have likely corrected the alignment of the text to be RTL because it tends to go with the majority of characters written (which in this case is RTL). However, that is not the case for mobile hangouts, that go by the first word.

Gmail for desktop aligns the sentence to the left as well, as if it is all LTR, but that’s because it never aligns the text to the right at all, even if the subject line is all Hebrew.

In short, RTL users expect this sentence to pose some sort of a problem, anywhere and everywhere.

But Gmail for Android, well… it seems to just shrug and give up. There are two pretty funny things went horribly wrong here:

* The sentence in Hebrew is basically unreadable (unless you know what to expect, and spend a moment deconstructing it)
* The ‘Inbox’ tag is in the middle of the sentence, chillin’ like a boss

## The directionality flow

Since the general environment is LTR and the sentence is mostly-RTL, the flow of the sentence is completely broken up. Here’s the logical flow of this sentence, where the pieces should be displayed from 1 to 5 sequentially:

<div style="text-align:center">

![The pieces of this sentence should go sequentially. One after the other...](/inthewild/mangled-subject-gmail-gmail-inbox-rtl-bidi-mobile-arrows.png)

</div>

The first three pieces (1, 2 and 3) are actually fairly straight forward – the are from right to left, but are “stuck” (in the general context) to the left because of the LTR general context. So, the sentence actually breaks apart as expected for a Left-to-Right-aligned Right-to-Left-text.

But what the hell is up with that “Inbox” tag in there? The system tries to attach the “Inbox” tag to the “End” of the sentence. The problem is that it seems to think that segment #4 is Left-to-Right (maybe because it starts with a number? Tsk tsk from Unicode BiDi algorithm, if so) and so it attaches the “Inbox” tag to the end — to the left.

Oy vey.

## Possible solutions
There are a few possible solutions here:

* Bidi-isolate the entire subject line. On the web, adding <bdi>…</bdi> tags or a bidi-isolate CSS rule will probably fix the ‘Inbox’ tag jump, at least. On Android, it will probably take a bit more work.
* Use a better algorithm to find the proper sentence alignment. I mean, really, Gmail — this is 95% Hebrew. Go RTL, will ya? You already have this algorithm working on Hangouts for web, after all.
* Also, amusingly, this is not happening in Gmail on iOS. There are Better Ways To RTL, Gmail for Android.

