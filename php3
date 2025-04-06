<?php
$n = 10;
$fib1 = 1;
$fib2 = 1;
echo "i\tfi\tfi+1 / fi\n";
echo "1\t1\t1\n";
echo "2\t1\t2\n";
for ($i = 3; $i <= $n; $i++) {
    $fibNext = $fib1 + $fib2;
    $ratio = $fibNext / $fib2;
    printf("%d\t%d\t%.6f\n", $i, $fibNext, $ratio);
    $fib1 = $fib2;
    $fib2 = $fibNext;
}
?>
