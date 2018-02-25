#!/bin/sh

of=items_sql.txt
while [ 1 ] ; do
	echo "what is the item name?"
	read NAME
	echo "what is the quantity?"
	read COUNT
	echo "what is the image url? put in quotes"
	read URL
	echo "INSERT INTO Items('$NAME', '$COUNT', '$URL') VALUES (1, 2, 3)" >> $of

	echo "\n"
done
