using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Overloading
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Item item1 = new Item();
            item1.Price = 5;
            Item item2 = new Item();
            item2.Price = 6;
            if (item1 == item2) MessageBox.Show("This items are different.");
        }
    }

    class Item
    {
        public int Price
        {
            get;
            set;
        }

        public static Item operator +(Item i1, Item i2)
        {
            Item i3 = new Item();
            i3.Price = i1.Price + i2.Price;
            return i3;
        }

        public static bool operator ==(Item i1, Item i2)
        { 
          return (i1.Price == i2.Price) ? true : false; 
        }

        public static bool operator !=(Item i1, Item i2)
        {
            return (i1.Price != i2.Price) ? true : false;
        }

    }
}
