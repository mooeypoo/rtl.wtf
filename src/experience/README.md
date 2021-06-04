# Experience Bidirectionality

In this page, you can experiment and experience different examples of bidirectionality on the web.

## 1: Left-to-Right context with Right-to-Left text

### Textarea: Direction LTR, with RTL text inside (1.1)

<textarea style="width: 100%;" dir="ltr">זהו טקסט בעברית. ניתן לשנותו.</textarea>

### ContentEditable: Direction LTR, with RTL text inside (1.2)

<div dir="ltr" contenteditable="true" style="text-align: left; border: 1px solid #ccc;">
    <p>זהו טקסט בעברית. ניתן לשנותו.</p>
</div>

## 2: Right-to-Left context with Left-to-Right text

### Textarea: Direction RTL, with LTR text inside (1.1)

<textarea style="width: 100%;" dir="rtl">This is an English text. This can be edited.</textarea>

### ContentEditable: Direction LTR, with RTL text inside (1.2)

<div dir="rtl" contenteditable="true" style="text-align: right; border: 1px solid #ccc;">
    <p>This is an English text. This can be edited.</p>
</div>
