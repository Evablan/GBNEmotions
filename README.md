# GBNEmotions

A comprehensive web application for monitoring and analyzing employee emotional well-being in corporate environments. Built with Laravel framework, this system provides real-time insights into workplace climate and organizational health.

## 🚀 Features

### Core Functionality
- **Employee Authentication System** with role-based access (Admin/Employee)
- **Daily Emotion Registration** with 5 emotional states (Happy, Neutral, Frustrated, Tense, Calm)
- **Dynamic Questionnaires** tailored to each selected emotion
- **Real-time Administrative Dashboard** with comprehensive statistics
- **Department-based Filtering** for targeted analysis
- **Multilingual Support** (English, Spanish, French)

### Technical Features
- **Responsive Design** with modern UI/UX
- **External API Integration** for employee data synchronization
- **Secure Authentication** using Laravel Breeze
- **Database Relationships** between users, departments, and emotions
- **Statistical Analysis** with percentage calculations and trends

## 🛠️ Technologies

- **Backend:** Laravel 12, PHP 8.2
- **Database:** MySQL with Eloquent ORM
- **Frontend:** Blade templates, Tailwind CSS, JavaScript
- **Authentication:** Laravel Breeze
- **Version Control:** Git

## 📊 Current Status

**Development Phase:** Active Development
- ✅ Core functionality implemented
- ✅ User authentication system
- ✅ Emotion registration interface
- ✅ Administrative dashboard
- ✅ Multilingual support
- ✅ Database structure
- 🔄 Additional features in progress
- 🔄 UI/UX improvements ongoing

## 🖼️ Screenshots

### Employee Emotion Registration Interface
![Employee Interface](screenshots/employee-interface.png)
*Intuitive emotion selection with dynamic questionnaires*

### Administrative Dashboard
![Admin Dashboard](screenshots/admin-dashboard.png)
*Real-time statistics and department filtering capabilities*

## 📋 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Evablan/GBNEmotions.git
   cd GBNEmotions
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start the application**
   ```bash
   php artisan serve
   npm run dev
   ```

## 🎯 Usage

### For Employees
1. Access the emotion registration form
2. Select your current emotional state
3. Answer contextual questions based on your emotion
4. Submit your daily emotional check-in

### For Administrators
1. Access the administrative dashboard
2. View real-time statistics and trends
3. Filter data by department
4. Analyze emotional patterns across the organization

## 🔧 Configuration

### External API Setup
The application integrates with an external API for employee data. Configure the API endpoint in your environment:
```
EXTERNAL_API_URL=http://127.0.0.1:8001/api/employee-uuids
```

### Language Configuration
Supported languages are configured in the `lang/` directory:
- English (`en/`)
- Spanish (`es/`)
- French (`fr/`)

## 📈 Project Goals

- **Improve workplace well-being** through emotional monitoring
- **Provide data-driven insights** for organizational decision-making
- **Enhance employee engagement** through regular check-ins
- **Support HR initiatives** with comprehensive emotional analytics

## 🤝 Contributing

This project is currently in active development. Contributions and feedback are welcome as we continue to enhance the system's capabilities.

## 📝 License

This project is developed for GBN organization. All rights reserved.

## 📞 Contact

For questions or support regarding GBNEmotions, please contact the development team.

---

**Note:** This project is currently under active development. Some features may be in progress or subject to change.
