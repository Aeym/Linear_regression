# Linear_regression

You will implement a simple linear regression with a single feature - in this case, the
mileage of the car.
To do so, you need to create two programs :
• The first program will be used to predict the price of a car for a given mileage.
When you launch the program, it should prompt you for a mileage, and then give
you back the estimated price for that mileage. The program will use the following
hypothesis to predict the price :
estimateP rice(mileage) = θ0 + (θ1 ∗ mileage)
Before the run of the training program, theta0 and theta1 will be set to 0.
• The second program will be used to train your model. It will read your dataset
file and perform a linear regression on the data.
Once the linear regression has completed, you will save the variables theta0 and
theta1 for use in the first program.
You will be using the following formulas :
tmpθ0 = learningRate ∗
1
m
mX−1
i=0
(estimateP rice(mileage[i]) − price[i])
tmpθ1 = learningRate ∗
1
m
mX−1
i=0
(estimateP rice(mileage[i]) − price[i]) ∗ mileage[i]
I let you guess what m is :)
Note that the estimatePrice is the same as in our first program, but here it uses
your temporary, lastly computed theta0 and theta1.
Also, don’t forget to simultaneously update theta0 and theta1.
