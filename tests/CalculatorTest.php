<?php

namespace Keystone\ReadingTime;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function testCalculate()
    {
        $text = <<<'TEXT'
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et elementum augue. Nulla interdum eget sem id viverra. Donec sit amet dignissim diam, at convallis ante. Praesent lacinia ullamcorper pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae neque ex. Sed vel nisi et nisi elementum molestie. Vivamus leo tortor, eleifend sed dui vitae, faucibus egestas ligula. Ut finibus leo at velit eleifend malesuada. Cras tristique, dui nec viverra interdum, urna nunc sagittis massa, vel vehicula leo risus at est. Quisque a diam massa.

In lobortis porta nunc. Etiam felis felis, rhoncus in rutrum in, fringilla in ante. Pellentesque dapibus, ligula vel dignissim facilisis, nisi arcu posuere leo, pellentesque dapibus urna metus id dui. Praesent in arcu sed mauris interdum semper sed sit amet nisl. Aenean ipsum nisl, vehicula at lacus ac, hendrerit suscipit felis. Phasellus volutpat eget est in ornare. Mauris libero leo, sollicitudin eu mollis ut, convallis in libero.

Proin ut volutpat augue. Nunc eu sapien dictum, interdum mi eget, tincidunt turpis. Vestibulum volutpat et odio quis condimentum. Donec eget quam feugiat, pulvinar arcu ac, suscipit turpis. Nam faucibus non leo et viverra. Maecenas aliquam lobortis eleifend. Nunc massa metus, eleifend ut vehicula aliquam, facilisis non nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin et massa et arcu rutrum viverra vel et tortor. Mauris accumsan mauris vitae massa placerat, eget placerat lorem facilisis. Nulla vel metus nec tortor gravida dignissim in congue neque.

Donec feugiat condimentum tellus, vitae aliquam dolor scelerisque sit amet. Ut id rhoncus turpis, eget eleifend ipsum. In volutpat sit amet sem sed finibus. Duis dapibus magna nec aliquam rhoncus. Vivamus quis rhoncus orci. Nam metus urna, viverra vulputate velit eget, lacinia fringilla turpis. Mauris ultrices ligula massa, sit amet hendrerit libero hendrerit et. Aliquam in tempor turpis. Donec tristique, risus ac pharetra aliquam, ex felis blandit erat, eget tempus ipsum metus vel turpis. Cras in vehicula dui. Aenean ullamcorper, ligula nec auctor pretium, magna tortor aliquam massa, id vulputate leo purus facilisis risus. Pellentesque risus tortor, ornare eu est et, cursus porttitor tortor. Vestibulum eget enim vel nisi fermentum scelerisque ut a metus. Nullam varius sagittis urna.

Cras porttitor quis nulla et viverra. Nulla pharetra neque id augue tincidunt tristique. Nulla elementum non felis at dictum. Suspendisse nisl orci, maximus at sodales a, ullamcorper eget diam. Nulla lacinia, nulla quis volutpat placerat, turpis sem sollicitudin tortor, sit amet fringilla ligula purus sed sapien. Vestibulum euismod augue nec arcu congue cursus. In rhoncus in tortor at rhoncus.
TEXT;

        $time = $this->calculator->calculate($text);

        $this->assertSame(94, $time->getSeconds());
        $this->assertSame(2, $time->getMinutes());
        $this->assertSame(431, $time->getWordCount());
        $this->assertSame(0, $time->getImageCount());
    }

    public function testCalculateWithImages()
    {
        $text = <<<'TEXT'
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et elementum augue. Nulla interdum eget sem id viverra. Donec sit amet dignissim diam, at convallis ante. Praesent lacinia ullamcorper pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae neque ex. Sed vel nisi et nisi elementum molestie. Vivamus leo tortor, eleifend sed dui vitae, faucibus egestas ligula. Ut finibus leo at velit eleifend malesuada. Cras tristique, dui nec viverra interdum, urna nunc sagittis massa, vel vehicula leo risus at est. Quisque a diam massa.

<img src="a.png">

In lobortis porta nunc. Etiam felis felis, rhoncus in rutrum in, fringilla in ante. Pellentesque dapibus, ligula vel dignissim facilisis, nisi arcu posuere leo, pellentesque dapibus urna metus id dui. Praesent in arcu sed mauris interdum semper sed sit amet nisl. Aenean ipsum nisl, vehicula at lacus ac, hendrerit suscipit felis. Phasellus volutpat eget est in ornare. Mauris libero leo, sollicitudin eu mollis ut, convallis in libero.

<img src="b.png">

Proin ut volutpat augue. Nunc eu sapien dictum, interdum mi eget, tincidunt turpis. Vestibulum volutpat et odio quis condimentum. Donec eget quam feugiat, pulvinar arcu ac, suscipit turpis. Nam faucibus non leo et viverra. Maecenas aliquam lobortis eleifend. Nunc massa metus, eleifend ut vehicula aliquam, facilisis non nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin et massa et arcu rutrum viverra vel et tortor. Mauris accumsan mauris vitae massa placerat, eget placerat lorem facilisis. Nulla vel metus nec tortor gravida dignissim in congue neque.

<img src="c.png">

Donec feugiat condimentum tellus, vitae aliquam dolor scelerisque sit amet. Ut id rhoncus turpis, eget eleifend ipsum. In volutpat sit amet sem sed finibus. Duis dapibus magna nec aliquam rhoncus. Vivamus quis rhoncus orci. Nam metus urna, viverra vulputate velit eget, lacinia fringilla turpis. Mauris ultrices ligula massa, sit amet hendrerit libero hendrerit et. Aliquam in tempor turpis. Donec tristique, risus ac pharetra aliquam, ex felis blandit erat, eget tempus ipsum metus vel turpis. Cras in vehicula dui. Aenean ullamcorper, ligula nec auctor pretium, magna tortor aliquam massa, id vulputate leo purus facilisis risus. Pellentesque risus tortor, ornare eu est et, cursus porttitor tortor. Vestibulum eget enim vel nisi fermentum scelerisque ut a metus. Nullam varius sagittis urna.

<img src="d.png">

Cras porttitor quis nulla et viverra. Nulla pharetra neque id augue tincidunt tristique. Nulla elementum non felis at dictum. Suspendisse nisl orci, maximus at sodales a, ullamcorper eget diam. Nulla lacinia, nulla quis volutpat placerat, turpis sem sollicitudin tortor, sit amet fringilla ligula purus sed sapien. Vestibulum euismod augue nec arcu congue cursus. In rhoncus in tortor at rhoncus.
TEXT;

        $time = $this->calculator->calculate($text);

        $this->assertSame(136, $time->getSeconds());
        $this->assertSame(3, $time->getMinutes());
        $this->assertSame(431, $time->getWordCount());
        $this->assertSame(4, $time->getImageCount());
    }

    public function testCalculateWithLotsOfImages()
    {
        $text = <<<'TEXT'
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et elementum augue. Nulla interdum eget sem id viverra. Donec sit amet dignissim diam, at convallis ante. Praesent lacinia ullamcorper pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae neque ex. Sed vel nisi et nisi elementum molestie. Vivamus leo tortor, eleifend sed dui vitae, faucibus egestas ligula. Ut finibus leo at velit eleifend malesuada. Cras tristique, dui nec viverra interdum, urna nunc sagittis massa, vel vehicula leo risus at est. Quisque a diam massa.

<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
<img src="image.png">
TEXT;

        $time = $this->calculator->calculate($text);

        $this->assertSame(140, $time->getSeconds());
        $this->assertSame(3, $time->getMinutes());
        $this->assertSame(96, $time->getWordCount());
        $this->assertSame(25, $time->getImageCount());
    }
}
