---
type: talk
image: /talks/2016-11-02-linux-conf-au.png
summary: A history and overview of the twisted road to RTL support
date: 2 November, 2016
---
# LCA: Wait, ?tahW

Wait Wait, ?tahW: The Twisted Road to Right-to-Left Language Support

This lecture was given in linux.conf.au Conference 2016 in Australia, introducing the challenges of supporting Right-to-Left online and when developing applications.

## Video

<iframe class="wtfvideo" src="https://www.youtube-nocookie.com/embed/OCQd02hORJQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

## Summary

As the popularity and reach of FLOSS grows, so does the need to support more languages. Internationalization support varies greatly by language, because each language needs particular features that may or may not work properly. One of the most challenging problems in language support is dealing with languages that are right-to-left, and the 500 million speakers of RTL languages often find themselves at the very bottom of the heap.

In fact, the support of those languages – on Linux, other operating systems, and on the Web – is so abysmal that it is hard to find a single piece of software that properly supports all the necessary behaviors.

The effect of right-to-left languages extends beyond the writing and reading of the script. The direction of reading has a significant psychological effect – where your eyes shift on the screen, your expectations of where interface elements should be, and what you expect when typing in a bi-directional setting.

The issues become even more complicated in an environment that handles bi-directionality. The questions of how systems should behave when two languages of two different directions interact become almost mind boggling. And yet, these are behaviors that right-to-left users encounter on a regular basis, and the solutions that are offered today prove to be extremely lacking.

In this presentation, I will cover some critical aspects that right-to-left users run into when dealing with software and websites, and potential solutions that are available, while concentrating on what developers should look out for and remember when they consider support for RTL languages. I will discuss:

* Use cases for dealing with RTL scripts – visual vs. logical cursor movement, typing and selecting, and, worst (or best) of all, dealing with mixed content.
* Examples from Linux distributions like Debian; the use of RTL file names in the GUI and terminal, typing in RTL in editors, etc.
* Unicode’s bi-directional algorithm and how it is utilized in Linux and on the Web; examples of hidden characters like “LRM” and “RLM” that preserve the directionality of embedded scripts, or LRO/RLO that force certain directionalities in strings.
* How the Web does it in general, and how specifically we at the Wikimedia Foundation handle translations, Wikipedias in RTL languages, and mixed LTR/RTL content.

## Accompaying tools

This lecture has a lot of demos and playing around with RTL issues. Feel free to experiment with some of those in the RTL-aligned textbox, and interacting with some of the files mentioned in the lecture.

### Textboxes

#### Textbox aligned with `dir="rtl"`
<textarea dir="rtl" style="width: 100%; border: 1px solid #000;">Try things out here!</textarea>

#### Textbox aligned with `dir="rtl"` with RTL text
<textarea dir="rtl" style="width: 100%; border: 1px solid #000;">עברית 123</textarea>

#### Textbox aligned with `dir="ltr"` with mixed text
<textarea dir="ltr" style="width: 100%; border: 1px solid #000;">English 1 2 3 עברית 1 2 3 English</textarea>

### Animated BMP

This is the source of the "animated bmp" trick in the lecture:

<div style="text-align:center">

![An animated image of a dancing cat named pmb.gif](./pmb.gif)

</div>

And the quick python script in the lecture (though you can use any language you want as long as you prepend the `LRO` control character)

```python
#!/usr/bin/env python
import shutil
shutil.copy("pbm.gif", u"\u202Epmb.gif")
```
