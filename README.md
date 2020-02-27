Epidemic
=======

A symptom and outbreak-confirmation based tracker for the movement, spread, and resilience of epidemic events.

This is a framework for a platform to help track epidemic movement based on analyzing generalized data. The idea of to create a heat map of symptoms and confirmations so you can have coordinated and organized quarantine and health service. This is largely to help provide real time transpancy for the public and for experts needing consistent user-submitted data. Do to inconsistencies from the early reporting and tracking styles for the Covid-19 virus from China and small initial sample sizes in the United States, trust worthy input regarding the disease's spread was hard to discern. This allows us to collect, share, and spread information in a sensible, rather than sensational fashion.

[Current Deployment](https://epidemic-tracker.herokuapp.com/)

### Basic Premise

1) New users will onboard with a survey assessment of their recent activity and geographic locations
2) Once on boarded, users will be prompted daily with a single question survey about any symptoms they have noticed along with a geocoded check in
3) Users will then be prompted to share the platform with friends in their networks
4) The platform homepage will provide charts, maps, graphs, statistics, and analyses of anonymized aggregated user informationto demonstrate a heat map of contagion and epidemiological activity
5) APIs will be provided for scientific and expert analysis
6) Triggers and warnings for different thresholds of heat map activity will send notifications to users to act insensible, non sensationalized, and efficacious ways in response to data. For example, the beginning of flu and cold seasons will remind users to increase the rate at which they wash hands. Confirmed cases of contagious vectors will alert caution. Increased activity could recommend and even locate vaccination centers. Confirmed spread of epidemic events based on geographic information as well as attributes of the contagion including incubation time, virality, and severity
7) Information about nearby contagions can be sent from the platform to users to provide information regarding the diseases with factual, accurate data from credible sources.
8) Anonymized data made accessible and available to authorities, epidemiologists, and a scientific communityare able to contribute to real time informationto help assess the actual spread of multiple epidemic events at once.
9) Analysis based on the appearance of certain symptoms, time between the appearance of symptoms and confirmed cases, length of time symptoms appear, and rates at which symptoms are demonstrated based on geographic check-ins can be analyzed to provide statistical assessments of the likelihood of given diseases and provide that information as a heat map of multiple contagions at once.


The Client
-------

The client is a user interface that sends you a daily notification for a single question survey. "Which if any of these symptoms are you experiencing?" You answer, it anonymizes your answer and gives it a broad location check-in. Simple way to track vectors for long incubation endemic diseases. Results will be published and help coordinate tracking and alerts. 

The Server
-------

Simply a collection of trends based on individual users (agents), their self reported assessment of symptoms, and their general geographic activity.

License
-------

Open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Current Challenges
-------

Questions
1) what are the HIPAA compliance measures needed to be made by nonentities to protect the storage of anonymized medical data?
2) what are the international considerations for the aggregation of information and the tracking of user activity?
3) what organizations provide the most credible information regarding epidemiological tracking systems?
4) what organizations provide the most accurate information regarding standard operating procedure during contagion events (CDC)?
5) what are the best considerations to make regarding a platform upon which to deploy this project (aws, heroku, open stack, etc)?
6) what existing third-party data analysis platforms exist specifically for this type of analysis (watson)?
7) what level of anonymity should be excercised (best practices)?
8) how narrow should geo check-in track and how wide should it report back?