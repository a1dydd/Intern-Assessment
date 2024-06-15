# Set the number of rows for the star pyramid
row = 9

# Iterate through each row
for i in range(row):
    # Calculate the number of leading spaces
    space = row - i - 1
    
    # Print the space
    print(' ' * space, end='')
    
    # Print the stars for the current row
    print('*' * (2 * i + 1))