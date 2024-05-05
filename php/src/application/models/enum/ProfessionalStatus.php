<?php

enum ProfessionalStatus: string
{
    case CONTRACTOR = 'contractor';
    case EMPLOYEE = 'employee';
    case FREELANCER = 'freelancer';
    case FULL_TIME = 'full_time';
    case INTERN = 'intern';
    case PART_TIME = 'part_time';
    case RETIRED = 'retired';
    case SELF_EMPLOYED = 'self_employed';
    case STUDENT = 'student';
    case UNEMPLOYED = 'unemployed';
}