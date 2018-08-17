<html>
    <body>
        <script>
            'use strict';
			let sum = 0;
            function findSum( a,b,c ) {
				alert( a+b+c );
				return a+b+c;
				
			}
			alert('Enter 3 marks');
			
			let a = prompt('Enter No  : ', 100);
			let b = prompt('Enter No  : ', 100);
			let c = prompt('Enter No  : ', 100);

			sum = findSum( a, b, c );
			alert(sum);
			
			alert(`Total Marks : ${sum}`);
			
			
        </script>
    </body>
</html>



		