using System.Text.RegularExpressions;
namespace Lab7
{
    class Program
    {
        static void Main()
        {
            Regex r = new Regex(@"((https?|ftp)\:\/\/)?([a-z0-9]{1})((\.[a-z0-9-])|([a-z0-9-]))*\.([a-z]{2,6})(\/?)");//создание выражения
            string text = Console.ReadLine();
            Match www = r.Match(text);//поиск в тексте по шаблону
            while (www.Success)
            {
                Console.WriteLine(www);
                www = www.NextMatch();//поиск следующего совпадения
            }
        }
    }
}
