function openwindows(page,w,h)
{
    window.open(page, "same",
                "width="+w+",height="+h+",menubar=no,scrollbars=0,left=" +
                ((screen.width - w)/2) + ",top=" + ((screen.height - h)/2));
}
