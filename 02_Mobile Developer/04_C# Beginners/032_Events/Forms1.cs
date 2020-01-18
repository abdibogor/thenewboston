using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Events
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            MyClass ac = new MyClass();
            ac.OnPropertyChanged += new EventHandler(ac.OnPropertyChanged);
            ac.Name = "Adam";
        }

        void ac_OnPropertyChanged(object sender, EventArgs e)
        {
            MessageBox.Show("The property has changed");
        }
    }
}
