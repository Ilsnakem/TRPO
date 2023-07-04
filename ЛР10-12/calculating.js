function calculate(a, b, c, x) 
{
    if (a < 0 && c!=0) 
    {
        return a * x * x + b * x + c;
    } 
    else if (a > 0 && c==0) 
    {
        return -a/(x-c)
    } 
    else 
    {
      return a*(x+c);
    }
}